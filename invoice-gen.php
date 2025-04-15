<think>
Okay, I need to create a PHP script that generates a printable invoice from product data. Let me think about how to approach this.

First, the user wants a printable invoice, so the output should be in a format that can be easily printed. HTML with proper styling would work, since browsers can print HTML pages. Maybe using CSS for styling the invoice layout.

The script should probably generate an HTML invoice. The data can be hardcoded for simplicity, but maybe include some sample product data. The user didn't specify data sources, so hardcoding makes sense here.

I should structure the HTML with a header, customer info, product list, totals, and a footer. Using tables might be effective for the product list. Also, adding media print styles to make it look good when printed, like hiding unnecessary elements or adjusting margins.

Let me outline the sections:

1. HTML doctype and head section with title and styles.
2. Body containing the invoice content.
3. Header with company logo and invoice number/date.
4. Customer details section.
5. Table for products: columns for Name, Price, Quantity, Total.
6. Calculate total amount, tax, and grand total.
7. Footer with company info and a note.

Wait, the user said "product data" but didn't specify input method. Since the task is to generate the script, maybe the product data can be an array in the PHP code. So I'll create an array of products with name, price, and quantity.

Then loop through the array to display each product in the table. Calculate the subtotals and totals using PHP variables.

Including CSS in the head section for styling. Maybe set a border, some padding, and adjust margins for printing. Using classes like .invoice-container to style the main content.

Also, adding a printer-friendly button? No, the user just wants it printable, so the page itself should be ready to print. Maybe add a media print stylesheet to ensure it looks good when printed.

Wait, the user said "printable invoice" so the HTML should be structured so that when the user clicks print, it's formatted properly. Maybe set the page size and margins via CSS @media print.

Putting all together: Start with PHP to handle the data processing, then output the HTML with embedded PHP for dynamic content.

Let me draft the code step by step.

First, the PHP section to define the products and calculate totals. Then the HTML structure.

Sample products array:

$products = [
    ['name' => 'Product 1', 'price' => 25.00, 'quantity' => 2],
    ['name' => 'Product 2', 'price' => 40.50, 'quantity' => 1],
    ['name' => 'Product 3', 'price' => 15.75, 'quantity' => 3],
];

Then calculate subtotal for each product: price * quantity. Then total all subtotals.

Tax could be a percentage, say 10%, so tax = total * 0.10. Grand total is total + tax.

Now in the HTML, display all that.

Also, the customer info: maybe a name, address, order date. Again, hardcoded for simplicity.

The header might have company name, invoice number, date.

Including a footer with company contact info.

Now, the HTML structure:

<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .invoice-container { width: 700px; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .total-section { margin-top: 20px; }
        @media print {
            .no-print { display: none; }
            .invoice-container { width: 100%; margin: 10px; }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <h2>Invoice</h2>
            <p>Invoice No: #12345</p>
            <p>Date: <?php echo date('Y-m-d'); ?></p>
        </div>
        <div class="customer-info">
            <h4>Customer Details</h4>
            <p>Name: John Doe</p>
            <p>Address: 123 Main St, City, Country</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo '$' . number_format($product['price'], 2); ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><?php echo '$' . number_format($product['price'] * $product['quantity'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="total-section">
            <table>
                <tr>
                    <td>Subtotal:</td>
                    <td><?php echo '$' . number_format($subtotal, 2); ?></td>
                </tr>
                <tr>
                    <td>Tax (10%):</td>
                    <td><?php echo '$' . number_format($tax, 2); ?></td>
                </tr>
                <tr>
                    <td>Grand Total:</td>
                    <td><?php echo '$' . number_format($grandTotal, 2); ?></td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Company Name, Inc.</p>
            <p>Address: 456 Business Rd, City, Country</p>
            <p>Contact: info@company.com | (123) 456-7890</p>
        </div>
    </div>
</body>
</html>

Wait, but I need to calculate the subtotal, tax, and grandTotal. So in PHP:

First, define the products array, then loop through to calculate subtotal.

So before the HTML starts:

<?php
$products = [
    ['name' => 'Product 1', 'price' => 25.00, 'quantity' => 2],
    ['name' => 'Product 2', 'price' => 40.50, 'quantity' => 1],
    ['name' => 'Product 3', 'price' => 15.75, 'quantity' => 3],
];

$subtotal = 0;
foreach ($products as $product) {
    $subtotal += $product['price'] * $product['quantity'];
}
$tax = $subtotal * 0.10;
$grandTotal = $subtotal + $tax;
?>

But where to put this code? It should be before the HTML starts. Since the user wants only the code, I'll make sure the PHP is properly placed.

Wait, in the code, the PHP variables are used in the HTML sections, so the code needs to be in the same script.

Putting all together, the complete code would start with the PHP variables and then the HTML with embedded PHP.

Also, the date in the header should be dynamic, using date('Y-m-d').

Testing the calculations: Let's see, the products:

Product 1: 25 *2 =50, Product2:40.50*1=40.50, Product3:15.75*3=47.25. Total is 50+40.5=90.5 +47.25=137.75. Subtotal 137.75, tax 13.7775 (rounded to 13.78?), Grand total 151.5275 (151.53).

Wait, in code, using number_format with 2 decimals. So that should display correctly.

Also, in the HTML table rows, the price and quantity are displayed, and each row's total is price*quantity.

The footer's company info is static.

I think this covers the requirements. The user wanted clean code without explanations, so just the PHP and HTML as per above.

Wait, in the code, the PHP opening tag is before the HTML. So the full code would be:

<?php
$products = [
    ['name' => 'Product 1', 'price' => 25.00, 'quantity' => 2],
    ['name' => 'Product 2', 'price' => 40.50, 'quantity' => 1],
    ['name' => 'Product 3', 'price' => 15.75, 'quantity' => 3],
];

$subtotal = 0;
foreach ($products as $product) {
    $subtotal += $product['price'] * $product['quantity'];
}
$tax = $subtotal * 0.10;
$grandTotal = $subtotal + $tax;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <!-- the HTML content as before -->
</body>
</html>

Wait, but the user didn't specify HTML structure. Maybe it's okay as long as it's valid. Alternatively, perhaps better to just have the PHP and HTML without the DOCTYPE, but the code should work.

Wait, in the code I wrote earlier, I didn't include the DOCTYPE and html tags. Let me check again.

Looking at the code I wrote earlier, after the PHP block, the HTML starts with <body> but that's not valid. Wait, no, in the previous code I had the <body> and the divs inside, but actually, the code should have the <html> and <head> etc.

Hmm, perhaps the user just wants the code, so including the necessary parts.

Alternatively, maybe the code is okay without the full HTML structure, but to make it valid, better to include it.

Wait, but the problem says to write the code, so as long as it's functional, perhaps it's okay.

Alternatively, perhaps the code I wrote earlier is sufficient, but let me confirm.

Wait, in the code I initially wrote, after the PHP variables, the HTML starts with the <body> tag but that is inside the <html> tag? Probably, but to make it valid, perhaps better to include the full HTML structure.

Let me re-edit:

The full code should start with the PHP variables, then the HTML:

<?php
$products = [
    ['name' => 'Product 1', 'price' => 25.00, 'quantity' => 2],
    ['name' => 'Product 2', 'price' => 40.50, 'quantity' => 1],
    ['name' => 'Product 3', 'price' => 15.75, 'quantity' => 3],
];

$subtotal = 0;
foreach ($products as $product) {
    $subtotal += $product['price'] * $product['quantity'];
}
$tax = $subtotal * 0.10;
$grandTotal = $subtotal + $tax;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <div class="date"><?php echo date('Y-m-d'); ?></div>
            <div class="company-info">
                <p>Company Name, Inc.</p>
                <p>Address: 456 Business Rd, City, Country</p>
                <p>Contact: info@company.com | (123) 456-7890</p>
            </div>
        </div>
        <div class="customer-info">
            <p>Customer Address: 123 Main St, City, Country</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo '$' . number_format($product['price'], 2); ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><?php echo '$' . number_format($product['price'] * $product['quantity'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="totals">
            <table>
                <tr>
                    <td>Subtotal:</td>
                    <td><?php echo '$' . number_format($subtotal, 2); ?></td>
                </tr>
                <tr>
                    <td>Tax (10%):</td>
                    <td><?php echo '$' . number_format($tax, 2); ?></td>
                </tr>
                <tr>
                    <td>Grand Total:</td>
                    <td><?php echo '$' . number_format($grandTotal, 2); ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>

Wait, but in the initial code I had a simpler structure. Maybe the user just wants the PHP and HTML without extra styling classes. To keep it minimal:

The code I initially wrote, but with the full HTML structure:

<?php
$products = [
    ['name' => 'Product 1', 'price' => 25.00, 'quantity' => 2],
    ['name' => 'Product 2', 'price' => 40.50, 'quantity' => 1],
    ['name' => 'Product 3', 'price' => 15.75, 'quantity' => 3],
];

$subtotal = 0;
foreach ($products as $product) {
    $subtotal += $product['price'] * $product['quantity'];
}
$tax = $subtotal * 0.10;
$grandTotal = $subtotal + $tax;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <div>
        <h1>Invoice</h1>
        <p>Date: <?php echo date('Y-m-d'); ?></p>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo '$' . number_format($product['price'], 2); ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><?php echo '$' . number_format($product['price'] * $product['quantity'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <p>Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
            <p>Tax (10%): $<?php echo number_format($tax, 2); ?></p>
            <p>Grand Total: $<?php echo number_format($grandTotal, 2); ?></p>
        </div>
    </div>
</body>
</html>

This is more minimal and valid.

Alternatively, perhaps the user expects a script that can be run on a server and generates the invoice, so the code is correct.

The initial code I provided was missing the HTML structure, but adding that in would make it complete.

Therefore, the answer should include the full PHP code with HTML structure.