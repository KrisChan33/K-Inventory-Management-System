# Application Overview
This document provides an overview of the application overview. For detailed information, visit the [Wiki](https://github.com/KrisChan33/K-Employee-Management-Web-App/wiki).

---
## Home Page
![alt text](ReadmeImages/Homepage.png)
---

## Login/Register
 Dark Mode: ![Dark Mode](ReadmeImages/logindark.png)
 Light Mode: ![Dark Mode](ReadmeImages/loginlight.png)
 Registration Page: ![Registration](ReadmeImages/registration.png)
# Admin Panel

### Features

The Admin Panel is accessible to the super admin and includes:

- **Super Admin Navigation Groups**:
  - User Management
  - Spatie (Roles & Permissions)

- **User Roles**:
  - Super Admin (controller access)
  - Staff

- **Security**:
  - Two-Factor Authentication (2FA) for enhanced security
---

## Navigation Groups

### Product Management
- **Products**: Manage product information.
  -  Add, update, and delete products.

- **Categories**: Manage category information.
  -  Add, update, and delete product categories.

- **Suppliers**: Manage supplier information.
  -  Add, update, and delete suppliers.

### Customer Management
- **Customers**: Manage customer records.
  -  Add, update, and delete customers.

### Order Management
- **Orders**: Manage order information.
  -  Create, view, update, and delete orders.

- **OrderItems**: Manage order item details.
  -  Add, update, and delete items within an order.

### User Management
- **Users**: Manage user information.
  -  View, update, and manage user roles and permissions.

---

### User Roles and Permissions

- **Admin**:
  - Can create, read, update, and delete (CRUD) all records.
  - Has access to all controllers and can manage all resources.
  - Can enable or disable 2FA.
  - Can enable or disable light/dark mode.

- **Staff**:
  - Can view any records in Customers, Orders, Order Items, Products, Suppliers, and own Profile Information.
  - Can create records in Orders, Order Items, and Products.
  - Can delete Orders, Order Items, Products, and own Profile Information.
  - Can update records in Orders, Order Items, Products, and own Profile Information.
  - Can enable or disable 2FA.
  - Can enable or disable Light/Dark Mode.
  - Cannot delete records or access admin-specific controllers.
--- 

# Nav for  (Admin)
### Admin Dashboard
![alt text](ReadmeImages/admin-dashboard.png)

### Admin Navigation
![alt text](ReadmeImages/admin-navigation.png)

### Customer (Table)
![alt text](ReadmeImages/admincostumer-table.png) 

### Customer (Form)
![alt text](ReadmeImages/admincostumer-form.png)

### Order (Table)
![alt text](ReadmeImages/Order.png)

### Order (Form)
![alt text](ReadmeImages/orderform1.png)
![alt text](ReadmeImages/orderform2.png)

### Order Item (Table)
![alt text](ReadmeImages/OrderItems-table.png)

### Order Item (Form)
![alt text](ReadmeImages/OrderItem-Form.png)

### Product (Table)
![alt text](ReadmeImages/product-table.png)

### Product (Form)
![alt text](ReadmeImages/Product-Form.png)

### Category (Table)
![alt text](ReadmeImages/category-table.png)

### Category (Form)
![alt text](ReadmeImages/category-form.png)

### Supplier(Table)
![alt text](ReadmeImages/Supplier-table.png)

### Performance Review Controller (Form)
![alt text](ReadmeImages/Supplier-form.png)


<!-- 
### Performance Review Controller (Table)
![alt text](ReadmeImages/image-13.png)

### Performance Review Controller (Form)
![alt text](ReadmeImages/image-13.png) -->


---


# Staff 

### Features

The Staff is accessible to the  panel user and includes:

- **Security**:
  - Two-Factor Authentication (2FA) for enhanced security
---
### Staff Navigation Groups

### Product Management
- **Products**: Manage product information.
  -  Add, update, and delete items within an product.

- **Categories**: View category information.
  - Can view/viewany product categories.

- **Suppliers**: View supplier information.
  -  Can view/viewany suppliers.

### Customer Management
- **Customers**: View customer records.
  -  Can view/viewany customers.

### Order Management
- **Orders**: Manage order information.
  -  Create, view, update, and delete orders.

- **Order Items**: Manage order item details.
  -  Add, update, and delete items within an order.
---

### User Roles and Permissions

- **Staff**:
  - Can view any records in Customers, Orders, Order Items, Products, Suppliers, and own Profile Information.
  - Can create records in Orders, Order Items, and Products.
  - Can delete Orders, Order Items, Products, and own Profile Information.
  - Can update records in Orders, Order Items, Products, and own Profile Information.
  - Can enable or disable 2FA.
  - Can enable or disable Light/Dark Mode.
  - Cannot delete records or access admin-specific controllers.
--- 


### Staff Dashboard
![alt text](ReadmeImages/employee-dashboard.png)

### Staff Nav
![alt text](ReadmeImages/employee-navigation.png)

## Navigations Groups

### Customer (Table)
![alt text](ReadmeImages/staff-customer-table.png)

### Order (Table)
![alt text](ReadmeImages/staff-order-table.png)


### Order (Form)
![alt text](ReadmeImages/staff-order-form.png)
![alt text](ReadmeImages/staff-order-form2.png)

### Order Items (Table)
![alt text](ReadmeImages/staff-orderitems-table.png)

### Order Items (Form)
![alt text](ReadmeImages/staff-orderitems-form.png)

### Product (Table)
![alt text](ReadmeImages/Staff-Product-table.png)

### Product (Form)
![alt text](ReadmeImages/Staff-Product-form.png)

### Category (Table)
![alt text](ReadmeImages/staff-Category-table.png)

### Supplier (Table)
![alt text](ReadmeImages/staff-Supplier-table.png)
---



### Edit Profile
Users and Admin have similar profile-editing options as including photo management.

![alt text](ReadmeImages/profile1.png)
![alt text](ReadmeImages/profile2.png)

---asdas

### 2FA Authentication
![alt text](ReadmeImages/2fa1.png)
![alt text](ReadmeImages/2fa2.png)
---

## Default Permissions for 'super_admin'
![alt text](ReadmeImages/image-28.png)
- Select all

## Default Permissions Needed to set for 'panel_user'
  Only check the list below for default staff permission.
![alt text](ReadmeImages/staff-role-default.png)
![alt text](ReadmeImages/staff-role-default2.png)
![alt text](ReadmeImages/staff-role-default3.png)
![alt text](ReadmeImages/staff-role-default4.png)
---

## Default Credentials
- For an overview of the Default Credential and its navigation options, visit the Default [Default Credentials Wiki](https://github.com/KrisChan33/K-Inventory-Management-Web-App/wiki/5.-Default-Credentials).

## Database and Zip File
- Refer to the [Database Wiki ](https://github.com/KrisChan33/K-Inventory-Management-Web-App/wiki/6.-Database) for instructions on importing the database and extracting resources.

## Requirements

- Ensure your system meets the following requirements before starting. For more details, see the [ Requirements Wiki](https://github.com/KrisChan33/K-Inventory-Management-Web-App/wiki/7.-Requirements).

## Instructions
- Complete installation and setup instructions are available in the [Setup Requirements Wiki.](https://github.com/KrisChan33/K-Inventory-Management-Web-App/wiki/8.-Instructions)

## Troubleshooting
- If you encounter missing `.env` or permissions errors, double-check file paths and server requirements.
- If `php artisan` commands fail, ensure PHP and Composer are installed and properly configured.


## License
 This project is licensed under the Apache 2.0 License - see the [LICENSE](LICENSE) file for details.
 
---
End of document.