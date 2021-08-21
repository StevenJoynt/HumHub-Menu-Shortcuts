# HumHub-Menu-Shortcuts

## What does it do? 

This is a HumHub module to add quick access shortcut keys (aka [access keys](https://www.w3schools.com/tags/att_global_accesskey.asp)) to the Space Menu.

This will allow an item from the Space Menu to be quickly activated by hitting Alt+letter or Alt+Shift+letter depending on the web browser. So up to 26 shortcuts can be defined. This can be useful when the menu scrolls off the visiable page due to a long stream or large Wiki page etc.

## How does it work?

Most of the functionality for this module is implemented in JavaScript at the client side. This is because it would be impractical to intercept or extend the API which builds the individual menu items. All calls to the new API would also need to be updated to define the shortcut keys for each menu item across all HumHub modules, and each of the administration configuration forms would also need to be changed to allow the shortcut keys to be specified.

This module examines and manipulates the generated menu using JavaScript to interrogate and update the HTML DOM in the browser. The PHP code simply provides HumHub event handlers and moves data between the database and the HTML views and forms.   
