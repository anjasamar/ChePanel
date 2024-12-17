# syntax=docker/dockerfile:1

FROM ubuntu:22.04 AS production

RUN apt-get update && apt-get install -yq wget
RUN ls -la
RUN wget https://raw.githubusercontent.com/anjasamar/ChePanel/main/installers/install.sh -O che-install.sh
RUN chmod +x che-install.sh
RUN ./che-install.sh

COPY entrypoint.sh /usr/local/che/entrypoint.sh

ENTRYPOINT ["sh","/usr/local/che/entrypoint.sh"]
