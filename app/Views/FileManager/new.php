<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileManager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="mx-6 my-4 font-serif">
    <h3 class="text-xl mb-4">
        Upload File
    </h3>

    <?php if(isset($errors)): ?>
        <?php foreach ($errors as $error): ?>
            <li class="mb-2">
                <?= esc($error) ?>
            </li>
        <?php endforeach ?>
    <?php endif; ?>

    <?php if(session()->has('success')): ?>
        <li class="mb-2">
            <?= session()->get('success') ?>
        </li>
    <?php endif; ?>

    <form
        action="<?= base_url('FileManager/create') ?>"
        method="post"
        enctype="multipart/form-data"
        class="mb-6"
    >
        <input
            type="file"
            name="file"
            id="file"
        />
        <button
            type="submit"
            class="transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
            Simpan
        </button>
    </form>

    <table class="table-fixed">
        <thead class="font-medium">
            <tr>
                <th class="border w-40 p-2">Nama</th>
                <th class="border w-72 p-2">File</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($files as $file): ?>
                <tr>
                    <td class="border p-2">
                        <?= $file->name ?>
                    </td>
                    <td class="border">
                        <img
                            src="<?= base_url('writable/uploads/' . $file->path) ?>"
                            alt="<?= $file->name ?>"
                            class="w-32 h-32 rounded p-4"
                        />
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if(count($files) == 0): ?>
                <tr>
                    <td class="border p-2" colspan="2">
                        Belum ada file yang diupload.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>