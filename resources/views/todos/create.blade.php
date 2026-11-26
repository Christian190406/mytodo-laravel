
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas | MyTodo</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f6fc;
            color: #252642;
            min-height: 100vh;
            padding: 45px 20px;
        }

        .container {
            max-width: 680px;
            margin: auto;
        }

        .back {
            display: inline-block;
            text-decoration: none;
            color: #6855e9;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .back:hover {
            color: #4938c9;
        }

        .form-card {
            background: white;
            border: 1px solid #ededf5;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 35px #29265a0b;
        }

        .form-header {
            background: linear-gradient(120deg, #5544d8, #8875f4);
            color: white;
            padding: 32px;
        }

        .form-header .icon {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .form-header h1 {
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 9px;
        }

        .form-header p {
            font-size: 13px;
            opacity: .85;
            line-height: 1.6;
        }

        .form-body {
            padding: 32px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .required {
            color: #e34c59;
        }

        input, textarea {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #e5e5ef;
            border-radius: 11px;
            background: #fafaff;
            font-family: inherit;
            font-size: 13px;
            color: #252642;
            outline: none;
            transition: .2s;
        }

        input:focus, textarea:focus {
            border-color: #6855e9;
            background: white;
            box-shadow: 0 0 0 3px #6855e91a;
        }

        textarea {
            min-height: 145px;
            resize: vertical;
            line-height: 1.7;
        }

        .field {
            margin-bottom: 23px;
        }

        .hint {
            font-size: 11px;
            color: #9999ac;
            margin-top: 9px;
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 8px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        button, .cancel {
            padding: 14px 20px;
            border-radius: 11px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: .2s;
        }

        button {
            flex: 1;
            border: none;
            color: white;
            background: linear-gradient(135deg, #6855e9, #4938c9);
            box-shadow: 0 6px 15px #6855e933;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 9px 20px #6855e955;
        }

        .cancel {
            background: #f2f1fa;
            color: #686783;
        }

        .cancel:hover {
            background: #e8e6f5;
        }

        .footer {
            text-align: center;
            font-size: 11px;
            color: #aaaabd;
            margin-top: 25px;
        }

        @media (max-width: 550px) {
            body {
                padding: 25px 14px;
            }

            .form-header, .form-body {
                padding: 23px;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <a href="{{ route('todos.index') }}" class="back">
            ← Kembali ke Dashboard
        </a>

        <div class="form-card">

            <div class="form-header">
                <div class="icon">✦</div>
                <h1>Buat Tugas Baru</h1>
                <p>
                    Tuliskan tugas yang ingin kamu selesaikan.
                    Mulai atur aktivitasmu hari ini!
                </p>
            </div>

            <div class="form-body">

                <form action="{{ route('todos.store') }}" method="POST">
                    @csrf

                    <div class="field">
                        <label for="title">
                            Judul Tugas <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Contoh: Mengerjakan tugas Laravel"
                            maxlength="255"
                            required
                        >

                        <p class="hint">Masukkan judul tugas yang jelas dan singkat.</p>

                        @error('title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="description">Deskripsi Tugas</label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Jelaskan detail tugas yang ingin kamu kerjakan..."
                        >{{ old('description') }}</textarea>

                        <p class="hint">Deskripsi bersifat opsional.</p>

                        @error('description')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="actions">
                        <a href="{{ route('todos.index') }}" class="cancel">
                            Batal
                        </a>

                        <button type="submit">
                            
                            ✓ Simpan Tugas
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div class="footer">
            MyTodo Pro — Organize your day, achieve your goals.
        </div>

    </div>
</body>
</html>
