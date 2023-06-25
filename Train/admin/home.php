<style>
    table {
        border-collapse: collapse;
        width: 30%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .output-title {
        font-family: 'Arial', sans-serif;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .key-column {
        white-space: nowrap;
        text-align: right;
        padding-right: 10px;
        width: 0%;
    }

    .value-column {
        padding-left: 10px;
    }
</style>

<h2 class="output-title"><?php echo ucfirst(strtolower('Selamat Datang administrator')); ?></h2>
<table>
    <tbody>
        <?php foreach ($_SESSION['pegawai'] as $key => $value): ?>
            <tr>
                <td class="key-column"><?php echo ucwords(str_replace("_", " ", $key)); ?>:</td>
                <?php if ($key === 'password'): ?>
                    <td class="value-column"><?php echo substr($value, 0, strlen($value) / 2) . str_repeat('*', strlen($value) / 2); ?></td>
                <?php else: ?>
                    <td class="value-column"><?php echo $value; ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
