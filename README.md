This is a CLI based password manager built and tested against Ubuntu 16.04. [Short demo youtube video](https://www.youtube.com/watch?v=x3cm7aNmgM8&feature=youtu.be).

## Requirements
I run it on Ubuntu 16.04 desktop. The only requirement is php7.0-cli package which you can install with:
```
sudo apt-get install php7.0-cli
```

To run the application, navigate to the src/ directory and run
```
./main
```

The tool makes sure to never to reveal your passwords to the terminal,  but will copy them into your clipboard. Passwords are also starred out whilst you enter them so that nobody will see them over your shoulder.

## Encryption
This tool stores your passwords in an encrypted form in a `passwords.json` file. It makes use of the [openssl library](http://php.net/manual/en/book.openssl.php)  for encryption using the AES-256-CBC cipher using randomly generated initialization vectors per password. This means that even if someone grabbed your `passwords.json` file, a malicious user wouldn't be able to tell if two accounts were using the same password by looking for matching encrypted strings.

## Why Open Source?
I hope this tool might prove useful to others, and perhaps by open sourcing it, others may find security issues that can be fixed.

## Docker
I would love to get this tool to work in docker so that other distros and Mac users could run it. It works well with the Dockerfile I added, but I don't know how to get the clipboard functionality to work. Please submit a pull request if you can fix this!

## Importing Passwords
Since 1.2, this tool has supported importing passwords from a CSV. To do this you need to create a CSV file, of which, the first row is ignored and considered headings. Copy and paste the following into a text file and save it with the `.csv` extension and fill in your passwords. Once the file is saved as .csv, you may find it easier to fill in the file using Excel or [LibreCalc](https://www.libreoffice.org/download/download/) which is **free!**.

```
"account name", "username", "plaintext password"
"facebook", "my.email@gmail.com", "thisismypassword"
```
Make a mental note of where you saved the file, then use the appropriate menu option for importing passwords before typing in the path to that file.

Enjoy!
