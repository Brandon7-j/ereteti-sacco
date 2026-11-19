<?php
require_once 'includes/db.php';
$page_title = 'Deliveries';
include 'includes/header.php';

$sql = "SELECT f.member_no, f.first_name, f.last_name, d.session, d.litres, d.accepted
        FROM milk_delivery d
        JOIN farmer f ON f.farmer_id = d.farmer_id
        WHERE d.delivery_date = '2026-10-12'
        ORDER BY f.member_no, d.session";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>

<main>
    <p><?php echo $count; ?> deliveries on this day.</p>

    <p>
        Milk received across all three routes — Kiserian, Ngong, and Rongai —
        for the morning and evening collection sessions.
    </p>

    <img src="img/collection-lorry.jpg"
         alt="Ereteti Dairy Sacco milk collection lorry">

    <h2>Record a delivery</h2>
    <form id="delivery-form" class="page-form" action="deliveries.php" method="post">
        <div class="form-grid">
            <div class="form-field">
                <label for="member">Member number</label>
                <input type="text" id="member" name="member_no"
                       placeholder="ER-0001" pattern="ER-[0-9]{4}"
                       maxlength="7" required>
                <p id="member-message" class="message" aria-live="polite"></p>
            </div>

            <div class="form-field">
                <label for="session">Session</label>
                <select id="session" name="session" required>
                    <option value="">Choose a session</option>
                    <option value="MORNING">Morning</option>
                    <option value="EVENING">Evening</option>
                </select>
            </div>

            <div class="form-field">
                <label for="litres">Litres</label>
                <input type="number" id="litres" name="litres"
                       min="0.01" max="200" step="0.01" required>
                <p id="litres-message" class="message" aria-live="polite"></p>
            </div>

            <div class="form-field">
                <label for="accepted">Acceptance</label>
                <select id="accepted" name="accepted" required>
                    <option value="1">Accepted</option>
                    <option value="0">Rejected</option>
                </select>
            </div>
        </div>

        <button type="submit">Record delivery</button>
        <p id="form-message" aria-live="polite"></p>
    </form>

    <table>
        <caption>Milk received, Monday 12 October 2026</caption>
        <thead>
            <tr>
                <th scope="col">Member</th>
                <th scope="col">Farmer</th>
                <th scope="col">Session</th>
                <th scope="col">Litres</th>
                <th scope="col">Accepted</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($count === 0) {
                echo '<tr><td colspan="5">No deliveries recorded on this day.</td></tr>';
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['accepted'] == 1) {
                        $accepted = 'Yes';
                    } else {
                        $accepted = 'No';
                    }

                    echo '<tr>';
                    echo '<td>' . $row['member_no'] . '</td>';
                    echo '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>';
                    echo '<td>' . ucfirst(strtolower($row['session'])) . '</td>';
                    echo '<td>' . $row['litres'] . '</td>';
                    echo '<td>' . $accepted . '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th scope="row" colspan="3">Accepted today</th>
                <td id="accepted-total"></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</main>

<?php include 'includes/footer.php'; ?>