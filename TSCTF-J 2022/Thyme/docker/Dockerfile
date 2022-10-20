FROM openjdk:8

WORKDIR /app
COPY ./Thyme-0.0.1-SNAPSHOT.jar /app
COPY ./flag /flag

RUN chmod 777 Thyme-0.0.1-SNAPSHOT.jar

EXPOSE 8090

ENTRYPOINT [ "java", "-jar", "Thyme-0.0.1-SNAPSHOT.jar"]
