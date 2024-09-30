import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import fs from 'fs'
import path from 'path'

function getLessFiles(dir, filesList = []) {
    const files = fs.readdirSync(dir);

    files.forEach(file => {
        const filePath = path.join(dir, file);

        if (fs.statSync(filePath).isDirectory()) {
            getLessFiles(filePath, filesList);
        } else if (file.endsWith('.less')) {
            filesList.push(filePath);
        }
    });

    return filesList;
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...getLessFiles('resources/less')
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            less: {
                math: 'always',
                relativeUrls: true,
                javascriptEnabled: true
            },
        },
    },
})