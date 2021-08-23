# HumHub-Menu-Shortcuts

## Audience

I've included this short document to give a brief overview to anyone who might want to edit this module, or take ideas from it.

## How does it work?

Most of the functionality for this module is implemented in JavaScript at the client side. This is because it would be impractical to intercept or extend the API which builds the individual menu items. All calls to the new API would also need to be updated to define the shortcut keys for each menu item across all HumHub modules, and each of the administration configuration forms would also need to be changed to allow the shortcut keys to be specified.

This module examines and manipulates the generated menu using JavaScript to interrogate and update the HTML DOM in the browser. The PHP code simply provides HumHub event handlers and moves data between the database and the HTML views and forms.   
