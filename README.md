# 3cx-snom-dect
3CX integration with Snom DECT XML Minibrowser

To goal of these scripts is to create a menu on Snom DECT phones that provide essential 3CX functions to the users. The integration is using the XML minibrowser for DECT devices that was added in firmware version 5.00 of the Snom DECT series. More details can be found here:
https://service.snom.com/display/wiki/XML+Minibrowser+for+DECT+M-Series

It should be compatible with all M300, M700 and M900 base stations, however it is only tested with M900.

## Supported functions
Currently, the following functions are implemented:
* Display of presence status and function codes to change the presence
* Display of queue status and function codes to sign in / sign off from queue
* Address book of all 3CX extensions

## Installation

### Patching template file for DECT base station
The template files for the DECT base stations are located in this folder:
`/var/lib/3cxpbx/Instance1/Data/Http/Templates/fxs`

Patch it like this:
```
wget https://raw.githubusercontent.com/RedTiger26/3cx-snom-dect/main/patchfiles/snomM900.fxs.xml.patch
patch /var/lib/3cxpbx/Instance1/Data/Http/Templates/fxs/snomM900.fxs.xml snomM900.fxs.xml.patch
```
