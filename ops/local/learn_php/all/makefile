# 啟動環境
up: down
	docker-compose -p learn_php up

# 關閉環境
down:
	docker-compose -p learn_php down

# 進入 container 的 bash
bash:
	docker-compose -p learn_php exec ${t} bash

# 重新 build 環境
build:
	docker-compose -p learn_php build

logs:
	docker-compose -p learn_php logs -f
