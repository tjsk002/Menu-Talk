FROM ubuntu:latest
LABEL authors="tjsk0"

ENTRYPOINT ["top", "-b"]