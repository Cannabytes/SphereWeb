class WebSocketClient {
	#_connection = null;
	#_events = [];
	#_connectionAttempts = 0;
	
	#_url;
	#_timeout;
	#_maxConnectionAttempts;
	#_lastMessageTime;

	constructor(options = {}) {
		if (!options.url) {
			throw new Error('Parameter url not specified!');
		}

		this.#_url = options.url;
		this.#_timeout = options.timeout ?? 1000;
		this.#_maxConnectionAttempts = options.maxConnectionAttempts ?? 5;
    }

	#_connectAsync() {
		return new Promise((resolve, reject) => {
			const ws = new WebSocket(this.#_url);
			ws.onopen = () => { resolve(ws) }
			ws.onerror = e => { reject(e) }
		});
	}



	async connect() {

		if (this.isConnected() || this.isConnecting()) {
			return;
		}

		try {
			this.#_connectionAttempts++;
			this.#_connection = await this.#_connectAsync();
			this.#_connectionAttempts = 0;
			console.info('Launcher: %cConnected!', 'color: green');
			$("#modal-start-launcher").modal('hide');
			if(clickToStartLauncher){
				successMessage(word_launcher_is_started, 700)
				clickToStartLauncher = false;
			}
			this.#_events.forEach(e => {
				if (e.type == 'open') {
					e.callback();
				} else {
					this.#_connection?.addEventListener(e.type, e.callback);
				}
			});
			this.#_connection.onclose = ({code}) => {
				if (code === 1000) { // https://datatracker.ietf.org/doc/html/rfc6455#section-11.7
					console.info('Launcher: %cNormal closure!', 'color: orange');
					return;
				}
				console.info('Launcher: %cConnection lost!', 'color: red');
				console.info('Launcher: %cAttempting to reconnect...', 'color: orange');
				setTimeout(() => this.connect(), this.#_timeout);
			};
		} catch (e) {
			console.info('Launcher: %cCouldn\'t connect!', 'color: red');

			/*
			if (this.#_connectionAttempts >= this.#_maxConnectionAttempts) {
				console.info('Launcher: %cConnection attempts limit reached!', 'color: orange');
				this.#_connectionAttempts = 0;
				return;
			}
			*/

			let currentTime = new Date().getTime();
			let formattedTime = new Date().toLocaleTimeString('ru-RU', { hour12: false });
			let timeDifference = this.#_lastMessageTime ? (currentTime - this.#_lastMessageTime) / 1000 : 'Нет сообщений';
			this.#_lastMessageTime = new Date().getTime(); // Обновляем время последнего сообщения

			console.info(`Launcher: %cAttempting to connect... / Разница с последним сообщением: ${timeDifference} секунд`, 'color: orange');
			setTimeout(() => this.connect(), this.#_timeout);
		}

	}



	disconnect() {
		if (this.#_connection !== null) {
			this.#_connection.onclose = () => {};
			this.#_connection.onerror = () => {};
		}
		this.#_connection?.close()
        this.#_connection = null
    }

	on(type, callback) {
		this.#_events.push({type, callback})
		if (type != 'open') {
			this.#_connection?.addEventListener(type, callback)
		}
	}
	
	off(type, callback) {
		this.#_events = this.#_events.filter(e => e.callback !== callback)
		if (type != 'open') {
			this.#_connection?.removeEventListener(type, callback)
		}
	}

	send(data) {
		this.#_connection?.send(JSON.stringify(data));
	}
	
	isConnecting() {
        return this.#_connection?.readyState === WebSocket.CONNECTING
    }

    isConnected() {
        return this.#_connection?.readyState === WebSocket.OPEN
    }

    isClosing() {
        return this.#_connection?.readyState === WebSocket.CLOSING
    }

    isClosed() {
        return this.#_connection?.readyState === WebSocket.CLOSED
    }
}
