<?php
$page_title = 'Welcome to Ereteti';
include 'includes/header.php';
?>
  <main>
    <p>Milk received at the Olepolos centre on the Kiserian route,
    Monday 12 October 2026. Both sessions are listed: the morning
    collection from 6.30am and the evening collection from 4.00pm.</p>

    <!-- Week 8: the clerk's form -->
    <h2>Record a delivery</h2>

    <form id="delivery-form" action="#" method="post">
      <label for="member">Member number</label>
      <input type="text" id="member" name="member_no"
             placeholder="ER-0000" required>
      <p id="member-message" class="message"
         aria-live="polite"></p>

      <label for="session">Session</label>
      <select id="session" name="session" required>
        <option value="">Choose a session</option>
        <option value="MORNING">Morning</option>
        <option value="EVENING">Evening</option>
      </select>

      <label for="litres">Litres</label>
      <input type="number" id="litres" name="litres"
             step="0.01" required>
      <p id="litres-message" class="message"
         aria-live="polite"></p>

      <button type="submit">Record delivery</button>
      <p id="form-message" aria-live="polite"></p>
    </form>

    <div class="table-scroll">
     <h2>Deliveries by route – Friday 2 October 2026</h2>

    <table border="1">

        <tr>
            <th rowspan="2">Route</th>
            <th rowspan="2">Farmer</th>
            <th colspan="2">Litres</th>
            <th rowspan="2">Total (L)</th>
        </tr>

        <tr>
            <th>Morning</th>
            <th>Evening</th>
        </tr>

        <!-- Gatundu North -->
        <tr>
            <td rowspan="3">Gatundu North</td>
            <td>Peter Mwangi</td>
            <td>12.0</td>
            <td>10.5</td>
            <td>22.5</td>
        </tr>

        <tr>
            <td>Grace Wanjiku</td>
            <td>9.0</td>
            <td>8.5</td>
            <td>17.5</td>
        </tr>

        <tr>
            <td>Joseph Kamau</td>
            <td>8.5</td>
            <td>7.0</td>
            <td>15.5</td>
        </tr>

        <!-- Gatundu South -->
        <tr>
            <td rowspan="3">Gatundu South</td>
            <td>Esther Njeri</td>
            <td>14.0</td>
            <td>12.5</td>
            <td>26.5</td>
        </tr>

        <tr>
            <td>Daniel Kariuki</td>
            <td>6.5</td>
            <td>6.0</td>
            <td>12.5</td>
        </tr>

        <tr>
            <td>Mercy Nyambura</td>
            <td>10.0</td>
            <td>9.5</td>
            <td>19.5</td>
        </tr>

        <!-- Kamwangi -->
        <tr>
            <td rowspan="2">Kamwangi</td>
            <td>Samuel Gitau</td>
            <td>18.0</td>
            <td>16.5</td>
            <td>34.5</td>
        </tr>

        <tr>
            <td>Lucy Wairimu</td>
            <td>7.5</td>
            <td>7.0</td>
            <td>14.5</td>
        </tr>

        <!-- Total -->
        <tr>
            <th colspan="2">All routes</th>
            <th>85.5</th>
            <th>77.5</th>
            <th>163.0</th>
        </tr>

    </table>
    </div>

    <p>Joseph Kamau's morning load failed the alcohol test and was
    rejected, so it is not counted in the day's total. It is still
    listed: a rejected load is recorded, never deleted, because the
    farmer has a right to see what happened to their milk.</p>
  </main>
<?php include 'includes/footer.php'; ?>
 