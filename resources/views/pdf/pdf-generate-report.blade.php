<!DOCTYPE html>
<html>
  <head>
    <title>ADDFI SSIS</title>
    <style>
      @page {
        size: A4 landscape;
        margin: 20px;
      }
      
      .styled-table {
        border-collapse: collapse;
        font-size: 0.9em;
        font-family: sans-serif;
        width: 100%;
      }
      
      .styled-table thead tr {
        text-align: left;
        border-bottom: 1px solid black;
      }
      
      .styled-table th,
      .styled-table td {
        padding: 12px 15px;
      }
      
      .styled-table tbody tr {
        border-bottom: 1px solid black;
      }
    </style>
  </head>
  <body>
    <div>
      <h3>Monthly Report</h3>
    </div>
    <table class="styled-table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Date Enrolled</th>
          <th>Name</th>
          <th>Age</th>
          <th>Locale</th>
          <th>District</th>
          <th>Medical Diagnosis</th>
          <th>Medical Category</th>
          <th>Doctor in Charge</th>
          <th>Social/Economical Category</th>
          <th>Update/Status</th>
          <th>Last Date Updated</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>01/10/2001</td>
          <td>Juan Dela Cruz</td>
          <td>21</td>
          <td>Locale</td>
          <td>District</td>
          <td>Cancer</td>
          <td>Surgical</td>
          <td>Juan Delos Reyes</td>
          <td>Sample</td>
          <td>01/10/2023</td>
          <td>01/10/2023</td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
