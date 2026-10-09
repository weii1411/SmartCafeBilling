<?php
// SmartCafe Billing - Basic version (single file)
// This version demonstrates the full flow before refactoring.

const CURRENCY = "VND";
const MEMBER_DISCOUNT_RATE = 0.10;
const MEMBER_MIN = 100000;
const PACKAGING_FEE_PER_ITEM = 2000;
const SERVICE_RATE = 0.05;

// Sample/raw input
$productName = "Salt Coffee";
$unitPrice = 45000;
$rawQuantity = "3";
$customerStatus = "MEMBER";
$productAvailable = true;

// Inspect raw types before conversion
echo "=== RAW DATA TYPES ===" . PHP_EOL;
var_dump($productName);
var_dump($unitPrice);
var_dump($rawQuantity);
var_dump($customerStatus);
var_dump($productAvailable);

// Normalize raw numeric input
$quantity = (int) trim($rawQuantity);

echo "Raw quantity type: " . gettype($rawQuantity) . PHP_EOL;
echo "Clean quantity type: " . gettype($quantity) . PHP_EOL;

// Business calculations
$subtotal = $unitPrice * $quantity;
$isMember = $customerStatus === "MEMBER";
$isDiscountEligible = $isMember && $subtotal >= MEMBER_MIN;
$discount = $isDiscountEligible ? $subtotal * MEMBER_DISCOUNT_RATE : 0;
$packagingFee = $quantity * PACKAGING_FEE_PER_ITEM;
$amountAfterDiscount = $subtotal - $discount;
$serviceFee = $amountAfterDiscount * SERVICE_RATE;
$total = $amountAfterDiscount + $packagingFee + $serviceFee;

$isValidCustomerStatus = ($customerStatus === "MEMBER" || $customerStatus === "GUEST");
$hasValidQuantity = $quantity > 0;
$isCheckoutReady = $hasValidQuantity && $productAvailable === true && $isValidCustomerStatus;
$status = $isCheckoutReady ? "READY TO ORDER" : "BLOCKED";

// Receipt text demonstrates concatenation (.) and append (.=)
$receipt = "SMARTCAFE BILLING" . PHP_EOL;
$receipt .= "Product: " . $productName . PHP_EOL;
$receipt .= "Unit price: " . number_format($unitPrice) . " " . CURRENCY . PHP_EOL;
$receipt .= "Quantity: " . $quantity . PHP_EOL;
$receipt .= "Subtotal: " . number_format($subtotal) . " " . CURRENCY . PHP_EOL;
$receipt .= "Discount: " . number_format($discount) . " " . CURRENCY . PHP_EOL;
$receipt .= "Packaging fee: " . number_format($packagingFee) . " " . CURRENCY . PHP_EOL;
$receipt .= "Service fee: " . number_format($serviceFee) . " " . CURRENCY . PHP_EOL;
$receipt .= "Total: " . number_format($total) . " " . CURRENCY . PHP_EOL;
$receipt .= "Status: " . $status . PHP_EOL;

echo PHP_EOL . $receipt;
?>
