<?php
// Convert raw input into the type used by calculations.
$quantity = (int) trim($rawQuantity);

// Inspect the type boundary (visible in the receipt for this lab).
$rawQuantityType = gettype($rawQuantity);
$cleanQuantityType = gettype($quantity);

// Calculate intermediate values.
$subtotal = $unitPrice * $quantity;

$isMember = $customerStatus === "MEMBER";
$isDiscountEligible = $isMember && $subtotal >= MEMBER_MIN;
$discount = $isDiscountEligible ? $subtotal * MEMBER_DISCOUNT_RATE : 0;

$packagingFee = $quantity * PACKAGING_FEE_PER_ITEM;
$amountAfterDiscount = $subtotal - $discount;
$serviceFee = $amountAfterDiscount * SERVICE_RATE;
$total = $amountAfterDiscount + $packagingFee + $serviceFee;

// Check the checkout gate.
$isValidCustomerStatus = ($customerStatus === "MEMBER" || $customerStatus === "GUEST");
$hasValidQuantity = $quantity > 0;
$isCheckoutReady = $hasValidQuantity && $productAvailable === true && $isValidCustomerStatus;
$status = $isCheckoutReady ? "READY TO ORDER" : "BLOCKED";
