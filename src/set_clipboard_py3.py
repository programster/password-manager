#!/usr/bin/python3

from gi.repository import Gtk, Gdk
import sys
from time import sleep

class Hello(Gtk.Window):

    def __init__(self):
        super(Hello, self).__init__()
        
        clipboardText = sys.argv[1]
        clipboard = Gtk.Clipboard.get(Gdk.SELECTION_CLIPBOARD)
        clipboard.set_text(clipboardText, -1)
        clipboard.store()


def main():
    Hello()
    
    

if __name__ == "__main__":
    main()
