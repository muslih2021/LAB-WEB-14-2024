<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .logout-btn {
            background-color: #007bff; /* warna biru */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            font-size: 16px;
        }
        .logout-btn:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome, Admin!</h1>
    <div class="info">
        <p><strong>Email:</strong> admin@gmail.com</p>
        <p><strong>Username:</strong> adminxxx</p>
    </div>
    <button class="logout-btn">Logout</button>

    <h2>All Users</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Faculty</th>
                <th>Batch</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Wd. Ananda Lesmono</td>
                <td>nanda@gmail.com</td>
                <td>nanda_aja</td>
                <td>Female</td>
                <td>MIPA</td>
                <td>2021</td>
            </tr>
            <tr>
                <td>Muhammad Arief</td>
                <td>arif@gmail.com</td>
                <td>arif_nich</td>
                <td>Male</td>
                <td>Hukum</td>
                <td>2021</td>
            </tr>
            <tr>
                <td>Eka Hanny</td>
                <td>eka@gmail.com</td>
                <td>eka59</td>
                <td>Female</td>
                <td>Keperawatan</td>
                <td>2021</td>
            </tr>
            <tr>
                <td>Adnan</td>
                <td>adnan@gmail.com</td>
                <td>adnan72</td>
                <td>Male</td>
                <td>Teknik</td>
                <td>2020</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
