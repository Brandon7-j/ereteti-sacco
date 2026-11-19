<?php
require_once 'includes/db.php';
$page_title = 'Apply for Membership';
include 'includes/header.php';

$sql = "SELECT route_id, route_name FROM route ORDER BY route_id";
$result = mysqli_query($conn, $sql);
?>

<main>
    <h2>Apply for membership</h2>
    <p>
        Any dairy farmer on the Kiserian, Ngong, or Rongai routes may
        apply to join Ereteti Dairy Sacco. Complete the required fields
        below to submit your application.
    </p>

    <form id="registration-form" class="page-form" action="process-register.php" method="post">
        <fieldset>
            <legend>Your details</legend>
            <div class="form-grid">
                <div class="form-field">
                    <label for="first_name">First name</label>
                    <input type="text" id="first_name" name="first_name"
                           maxlength="40" autocomplete="given-name" required>
                </div>

                <div class="form-field">
                    <label for="last_name">Last name</label>
                    <input type="text" id="last_name" name="last_name"
                           maxlength="40" autocomplete="family-name" required>
                </div>

                <div class="form-field">
                    <label for="nationalID">National ID number</label>
                    <input type="text" id="nationalID" name="nationalID"
                           inputmode="numeric" pattern="[0-9]{7,8}"
                           minlength="7" maxlength="8" autocomplete="off" required>
                    <p class="message" id="nationalIDMessage" aria-live="polite"></p>
                </div>

                <div class="form-field">
                    <label for="phone">Phone number</label>
                    <input type="tel" id="phone" name="phone"
                           placeholder="07XXXXXXXX" pattern="(07|01)[0-9]{8}"
                           maxlength="10" autocomplete="tel" required>
                    <p class="message" id="phoneMessage" aria-live="polite"></p>
                </div>

                <div class="form-field">
                    <label for="route">Route</label>
                    <select id="route" name="route" required>
                        <option value="">Choose a route</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . (int) $row['route_id'] . '">'
                                . htmlspecialchars($row['route_name'], ENT_QUOTES, 'UTF-8')
                                . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-field">
                    <label for="joiningDate">Date of joining</label>
                    <input type="date" id="joiningDate" name="joiningDate" required>
                </div>
            </div>
        </fieldset>

        <div class="form-consent">
            <input type="checkbox" id="acceptRules" name="acceptRules"
                   value="yes" required>
            <label for="acceptRules">I accept the sacco's rules</label>
        </div>

        <button type="submit">Apply to join</button>
    </form>
</main>

<?php include 'includes/footer.php'; ?>