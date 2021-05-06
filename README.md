# 3cx-snom-dect
3CX integration with Snom DECT XML Minibrowser

To goal of these scripts is to create a menu on Snom DECT phones that provide essential 3CX functions to the users.

## Supported functions
Currently, the following functions are implemented:
* Display of presence status and function codes to change the presence
* Display of queue status and function codes to sign in / sign off from queue
* Address book of all 3CX extensions

## Installation

### Patching template file for DECT base station
The template files for the DECT base stations are located in this folder:
/var/lib/3cxpbx/Instance1/Data/Http/Templates/fxs
