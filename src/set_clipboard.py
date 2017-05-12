# Quick 'hack' of a script to take advantage of the gtk clipboard in ubuntu

import pygtk
pygtk.require('2.0')
import gtk
import sys

clipboardText = sys.argv[1]

# get the clipboard
clipboard = gtk.clipboard_get()

# set the clipboard text data
clipboard.set_text(clipboardText)

# make our data available to other applications
clipboard.store()