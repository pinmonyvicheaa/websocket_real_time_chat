# Web Socket Real-time Chat using Laravel and Vue JS

This project is a basic setup for building a real-time app using Laravel, Laravel Reverb (which works like Pusher), + Vue JS. It allows users to join, send messages, and see new messages in real time. This helps create a fast and enjoyable chatting experience.

## Installation:

Step 1: Clone the Repository
```
git clone https://github.com/pinmonyvicheaa/websocket_real_time_chat.git
cd websocket_real_time_chat
```

Step 2: Install Dependencies
```
composer install
npm install
```

Step 3: Copy .env File
```
cp .env.example .env
```

Step 4: Set Your Environment Variables

- Edit .env file and set your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

- Edit pusher (Take from pusher.com) in .env:
```
REVERB_APP_ID=any-random-app-id
REVERB_APP_KEY=any-random-app-key
REVERB_APP_SECRET=any-random-app-secret
REVERB_HOST="localhost"
REVERB_PORT=8080
REVERB_SCHEME=http
```

Step 5: Generate Application Key
```
php artisan key:generate
```

Step 6: Run Migrations

- This will create the necessary tables in your database:
```
php artisan migrate
```

Step 7: Serve the Application

- Start the Laravel development server (Terminal: 4 Tabs):
```
npm run dev:tailwind
php artisan reverb:start
php artisan queue:listen
php artisan serve
```

I ran "npm run dev:tailwind" instead of "npm run dev" since the project uses a custom Tailwind theme built using the Laravel Themer package.

- Now it should be running at:
```
http://127.0.0.1:8000
```

## Demo:

[![Real-time Chat](https://github.com/user-attachments/assets/6253e50b-57bc-4ba3-89ba-742f0721779d)](https://youtu.be/watch?v=9VtR6X_1GJs&t=1060s)
