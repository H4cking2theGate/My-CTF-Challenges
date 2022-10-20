FROM python:3.8

COPY ./app /app
COPY ./flag /ffffl111l1a44a4ggg
WORKDIR /app

ENV PYTHONUNBUFFERED=0

RUN pip install -r requirements.txt -i https://pypi.tuna.tsinghua.edu.cn/simple
RUN rm requirements.txt

RUN useradd -m ctf \
    && chown -R ctf:ctf /app

USER ctf

EXPOSE 8000

CMD python3 app.py