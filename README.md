# Codes Generator
*codes-generator*

Allows you to draw codes of a given length and number through CLI or WEB. Additionally, it generates a text file with randomly drawn codes. Plain PHP, **no frameworks**.

Description of all available options (from CLI):
```
php index.php --help
```
*It returns following:*
#### -h, --help
Showing this description and ends program
#### -l, --length [NUMBER]
Setting the length of each code. Default is 10.
#### -a, --amount [NUMBER]
Setting the amount of generated codes. Default is 1.
#### -f, --file [FILE NAME]
Setting the text file name, to save codes in. By default the name is 'codes.txt'.

If you'd like to run it from web browser, open *form.html* file.

# Applicability

Can be used to generate:
- discount codes for shops/services,
- activation keys for software (if done right),
- anything else where is need to use huge amount of random codes.