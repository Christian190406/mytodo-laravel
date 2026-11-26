
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyTodo - Task Manager</title>

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
            max-width: 1000px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            gap: 20px;
        }

        .logo {
            font-size: 27px;
            font-weight: 800;
            color: #5546d9;
            margin-bottom: 9px;
        }

        .subtitle {
            color: #85869c;
            font-size: 14px;
        }

        .add-button {
            background: linear-gradient(135deg, #6855e9, #4938c9);
            color: white;
            padding: 13px 20px;
            text-decoration: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 6px 15px #6855e933;
            transition: .2s;
        }

        .add-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 9px 20px #6855e955;
        }

        .welcome {
            background: linear-gradient(120deg, #5544d8, #8875f4);
            color: white;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px #5544d826;
        }

        .welcome h2 {
            font-size: 23px;
            margin-bottom: 9px;
        }

        .welcome p {
            font-size: 14px;
            opacity: .85;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 16px;
            border: 1px solid #ededf5;
        }

        .stat-label {
            color: #85869c;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 800;
            color: #5142cf;
        }

        .section-title {
            font-size: 19px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .todo-card {
            background: white;
            border: 1px solid #ededf5;
            padding: 22px;
            border-radius: 16px;
            margin-bottom: 15px;
            transition: .2s;
        }

        .todo-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px #29265a0d;
        }

        .todo-card.completed {
            background: #f8f7ff;
        }

        .todo-top {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: flex-start;
        }

        .todo-card h3 {
            font-size: 16px;
            margin-bottom: 9px;
        }

        .todo-card.completed h3 {
            text-decoration: line-through;
            color: #999;
        }

        .description {
            font-size: 13px;
            color: #85869c;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .status {
            font-size: 11px;
            padding: 7px 11px;
            border-radius: 20px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status.done {
            background: #e4f8ed;
            color: #21965b;
        }

        .status.pending {
            background: #fff3dc;
            color: #bd8420;
        }

        .todo-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            border-top: 1px solid #f0f0f5;
            padding-top: 15px;
        }

        .date {
            font-size: 12px;
            color: #9999ac;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        button {
            border: none;
            padding: 9px 13px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        button:hover {
            opacity: .85;
            transform: translateY(-1px);
        }

        .toggle-button {
            background: #eeeaff;
            color: #5948d5;
        }

        .delete-button {
            background: #fff0f0;
            color: #e34c59;
        }

        .success {
            background: #e4f8ed;
            color: #21965b;
            padding: 13px 16px;
            border-radius: 11px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .empty {
            background: white;
            text-align: center;
            padding: 55px 20px;
            border-radius: 16px;
            color: #9999ac;
            border: 1px solid #ededf5;
        }

        .empty h3 {
            color: #393957;
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            color: #aaaabd;
            font-size: 12px;
            margin-top: 35px;
        }

        @media (max-width: 650px) {
            body {
                padding: 25px 14px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .welcome {
                padding: 23px;
            }

            .todo-top {
                flex-direction: column;
            }

            .todo-bottom {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    @php
        $total = $todos->count();
        $completed = $todos->where('is_completed', true)->count();
        $pending = $total - $completed;
    @endphp

    <div class="container">

        <div class="header">
            <div>
                <div class="logo">✦ MyTodo.</div>
                <p class="subtitle">Kelola tugasmu, capai tujuanmu.</p>
            </div>

            <a href="{{ route('todos.create') }}" class="add-button">
                + Tambah Tugas
            </a>
        </div>

        <div class="welcome">
            <h2>Halo! Selamat Datang 👋</h2>
            <p>Atur aktivitas harianmu dan selesaikan satu per satu.</p>
        </div>

        <div class="stats">
            <div class="stat-card">
                <p class="stat-label">Total Tugas</p>
                <div class="stat-number">{{ $total }}</div>
            </div>

            <div class="stat-card">
                <p class="stat-label">Belum Selesai</p>
                <div class="stat-number">{{ $pending }}</div>
            </div>

            <div class="stat-card">
                <p class="stat-label">Sudah Selesai</p>
                <div class="stat-number">{{ $completed }}</div>
            </div>
        </div>

        <h2 class="section-title">Daftar Tugas Saya</h2>

        @if (session('success'))
            <div class="success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @forelse ($todos as $todo)
            <div class="todo-card {{ $todo->is_completed ? 'completed' : '' }}">

                <div class="todo-top">
                    <div>
                        <h3>{{ $todo->title }}</h3>

                        <p class="description">
                            {{ $todo->description ?: 'Tidak ada deskripsi.' }}
                        </p>
                    </div>

                    <span class="status {{ $todo->is_completed ? 'done' : 'pending' }}">
                        {{ $todo->is_completed ? '✓ Selesai' : '● Belum selesai' }}
                    </span>
                </div>

                <div class="todo-bottom">
                    <div class="date">
                        @if ($todo->completed_at)
                            ✓ Selesai pada:
                            {{ $todo->completed_at->format('d M Y') }}
                        @else
                            ◷ Belum ada tanggal penyelesaian
                        @endif
                    </div>

                    <div class="actions">
                        <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="toggle-button">
                                {{ $todo->is_completed ? 'Batalkan' : '✓ Selesaikan' }}
                            </button>
                        </form>

                        <form action="{{ route('todos.destroy', $todo->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-button">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @empty
            <div class="empty">
                <h3>Belum Ada Tugas 📝</h3>
                <p>Mulai buat daftar tugas pertamamu sekarang.</p>
            </div>
        @endforelse

        <div class="footer">
            MyTodo. — Organize your day, achieve your goals.
        </div>

    </div>
</body>
</html>
