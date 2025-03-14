<form action="process-giftcard.php" method="POST">
    <label>Recipient Email:</label>
    <input type="email" name="recipient_email" required>

    <label>Gift Card Amount:</label>
    <input type="number" name="amount" min="1" required>

    <button type="submit">Buy Gift Card</button>
</form>