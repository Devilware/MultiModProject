# MultiModProject
MultimoduleProject Y3 - Andrew Gilbey - C00263656

Project Name: Multimodule Project across Software Engineering for Cyber, Cryptography and Legislation

Based on:
Scenario 1
Upload an antigen test with a photo.
Our national health service has decided to create a portal that will allow citizens to report a positive
antigen test for COVID-19 and to list their close contacts online. Citizens who have symptoms of
the virus or are a close contact of a confirmed case can use store-bought test kits and upload any
positive results to the portal. The system will require citizens to create an account with a username
and password, to provide personal information including full name, address, date of birth and phone
number, and to upload an image of a positive antigen test. They can also provide a list of close
contacts, including their full names and phone numbers.

Web site name/project name: Sentinel

The Database(s) structure SQL is stored in the database folder in the main branch.
The link to my video demonstration is in my Video-Demo folder.
The encryption functions are stored in the cryptography.inc.php file in the includes folder. 

Encryption algorithim used was AES-256-CTR
The IVs are generated using random_bytes to generate cryptographically secure random bytes.

Encryption functions are used in the following pages:

Encryption:
upload.inc.php
update.inc.php
signup.inc.php
ccUpload.inc.php

Decryption:
signup.php
upload.php
manageDetails.php

Just a quick note that all images across the site were created by me.
