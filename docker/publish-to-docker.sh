docker compose up --build --force-recreate
docker tag che-panel:latest anjasamar/che-panel:latest
docker push anjasamar/che-panel:latest
