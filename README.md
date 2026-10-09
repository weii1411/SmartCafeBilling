# SmartCafe Billing — PHPLab01

## Business assumptions used in this implementation
These values are chosen for the assignment because the Requirement allows the student to choose values and document the rules:
- Currency: VND
- Unit price: 45,000 VND
- Raw quantity: `"3"` (string), cast to integer before calculations
- Customer status: `MEMBER`
- Member discount: 10% when status is exactly `MEMBER` and subtotal >= 100,000 VND
- Packaging: 2,000 VND per item
- Service fee: 5% of subtotal after discount
- Checkout is ready only when quantity > 0, product is available, and status is `MEMBER` or `GUEST`

## Files
- `index.php`: Basic single-file version demonstrating variables, constants, types, casting, operators, and receipt concatenation.
- `config/constants.php`: Fixed business configuration.
- `data/smartcafe-data.php`: Sample/raw input.
- `src/smartcafe.php`: Casting, business calculations, conditions, and status.
- `views/receipt.php`: HTML receipt display only.
- `index-refactored.php`: Entry point for the refactored web version.
- `.gitignore`: Ignores common local/editor files.

## Run with XAMPP
1. Copy the `SmartCafeBilling` folder into XAMPP's `htdocs` folder.
2. For the Basic version, open `http://localhost/SmartCafeBilling/`.
3. For the refactored version, open `http://localhost/SmartCafeBilling/index-refactored.php`.
4. To run the Basic version in a terminal, open the project folder and run `php index.php`.

## Expected main calculation for the sample input
- Subtotal = 45,000 × 3 = 135,000 VND
- Discount = 135,000 × 10% = 13,500 VND
- Packaging fee = 3 × 2,000 = 6,000 VND
- Amount after discount = 135,000 − 13,500 = 121,500 VND
- Service fee = 121,500 × 5% = 6,075 VND
- Total = 121,500 + 6,000 + 6,075 = 133,575 VND
- Status = READY TO ORDER
