#### Functions
- seeders
+ soft deleting
- sorting categories, items by count of items, expenses, respectively
- filter by price greater or less than, etc
+ show form if the item is new, create new route that store the item and flush the item_id to session, and redirect to create expense form

### Alpine.js
- media upload
+ drop down suggestion item with price, category & option to overwrite the item or create a new one


### Small features
+ informative status message with link to navigate, delete, restore
+ show items select box by most recorded
? check the current balance for adding expenses
- remeber date inserted expense form
- allow zero cost expense
- unknown category

### fix
<!-- - expense of a deleted item, Attempt to read property "name" on null -->
- create form's interactivity not working with second user
- soft deleted items interrupting with new item


### UI
- show note in table
+ order by column, toggle ascending, descending
- show cost with number_format
+ show warrning for expense that will zero or negative the remainig balance
    using x-show attribute
- create expense mutliple items
    new item with price, category

### Random features
- status of remaining balance by color
- validate y

### Large features
- create a bank account and link expense, income to it, instead of user_id
    (planning to have multiple users belong to one account, syncing data)

### Refactor
- helper file for printing money
- helper function to differentiate item name
- move if statement inside form template into slots