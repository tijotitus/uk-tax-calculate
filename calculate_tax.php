<?php
if (isset($_POST['income'])) {
    $income = (float)$_POST['income'];
    $tax = 0;

    // Personal Allowance: Up to £12,570 (0% Tax)
    if ($income <= 12570) {
        $tax = 0;
    } 
    // Basic Rate: £12,571 to £50,270 (20% Tax)
    elseif ($income <= 50270) {
        $tax = ($income - 12570) * 0.20;
    } 
    // Higher Rate: £50,271 to £125,140 (40% Tax)
    elseif ($income <= 125140) {
        $tax = (50270 - 12570) * 0.20; // Basic rate tax
        $tax += ($income - 50270) * 0.40;
    } 
    // Additional Rate: Over £125,140 (45% Tax)
    else {
        $tax = (50270 - 12570) * 0.20; // Basic rate tax
        $tax += (125140 - 50270) * 0.40; // Higher rate tax
        $tax += ($income - 125140) * 0.45; // Additional rate tax
    }

    // Output the tax rounded to 2 decimal places
    echo number_format($tax, 2);
} else {
    echo "Invalid input";
}
?>
