// vite.config.js
import { defineConfig } from "file:///D:/Program/OSPanel/domains/ahead-test/node_modules/vite/dist/node/index.js";
import laravel from "file:///D:/Program/OSPanel/domains/ahead-test/node_modules/laravel-vite-plugin/dist/index.js";
import fs from "fs";
import path from "path";
function getLessFiles(dir, filesList = []) {
  const files = fs.readdirSync(dir);
  files.forEach((file) => {
    const filePath = path.join(dir, file);
    if (fs.statSync(filePath).isDirectory()) {
      getLessFiles(filePath, filesList);
    } else if (file.endsWith(".less")) {
      filesList.push(filePath);
    }
  });
  return filesList;
}
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: [
        ...getLessFiles("resources/less")
      ],
      refresh: true
    })
  ],
  css: {
    preprocessorOptions: {
      less: {
        math: "always",
        relativeUrls: true,
        javascriptEnabled: true
      }
    }
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJEOlxcXFxQcm9ncmFtXFxcXE9TUGFuZWxcXFxcZG9tYWluc1xcXFxhaGVhZC10ZXN0XCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ZpbGVuYW1lID0gXCJEOlxcXFxQcm9ncmFtXFxcXE9TUGFuZWxcXFxcZG9tYWluc1xcXFxhaGVhZC10ZXN0XFxcXHZpdGUuY29uZmlnLmpzXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ltcG9ydF9tZXRhX3VybCA9IFwiZmlsZTovLy9EOi9Qcm9ncmFtL09TUGFuZWwvZG9tYWlucy9haGVhZC10ZXN0L3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSdcbmltcG9ydCBsYXJhdmVsIGZyb20gJ2xhcmF2ZWwtdml0ZS1wbHVnaW4nXG5pbXBvcnQgZnMgZnJvbSAnZnMnXG5pbXBvcnQgcGF0aCBmcm9tICdwYXRoJ1xuXG5mdW5jdGlvbiBnZXRMZXNzRmlsZXMoZGlyLCBmaWxlc0xpc3QgPSBbXSkge1xuICAgIGNvbnN0IGZpbGVzID0gZnMucmVhZGRpclN5bmMoZGlyKTtcblxuICAgIGZpbGVzLmZvckVhY2goZmlsZSA9PiB7XG4gICAgICAgIGNvbnN0IGZpbGVQYXRoID0gcGF0aC5qb2luKGRpciwgZmlsZSk7XG5cbiAgICAgICAgaWYgKGZzLnN0YXRTeW5jKGZpbGVQYXRoKS5pc0RpcmVjdG9yeSgpKSB7XG4gICAgICAgICAgICBnZXRMZXNzRmlsZXMoZmlsZVBhdGgsIGZpbGVzTGlzdCk7XG4gICAgICAgIH0gZWxzZSBpZiAoZmlsZS5lbmRzV2l0aCgnLmxlc3MnKSkge1xuICAgICAgICAgICAgZmlsZXNMaXN0LnB1c2goZmlsZVBhdGgpO1xuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICByZXR1cm4gZmlsZXNMaXN0O1xufVxuXG5leHBvcnQgZGVmYXVsdCBkZWZpbmVDb25maWcoe1xuICAgIHBsdWdpbnM6IFtcbiAgICAgICAgbGFyYXZlbCh7XG4gICAgICAgICAgICBpbnB1dDogW1xuICAgICAgICAgICAgICAgIC4uLmdldExlc3NGaWxlcygncmVzb3VyY2VzL2xlc3MnKVxuICAgICAgICAgICAgXSxcbiAgICAgICAgICAgIHJlZnJlc2g6IHRydWUsXG4gICAgICAgIH0pLFxuICAgIF0sXG4gICAgY3NzOiB7XG4gICAgICAgIHByZXByb2Nlc3Nvck9wdGlvbnM6IHtcbiAgICAgICAgICAgIGxlc3M6IHtcbiAgICAgICAgICAgICAgICBtYXRoOiAnYWx3YXlzJyxcbiAgICAgICAgICAgICAgICByZWxhdGl2ZVVybHM6IHRydWUsXG4gICAgICAgICAgICAgICAgamF2YXNjcmlwdEVuYWJsZWQ6IHRydWVcbiAgICAgICAgICAgIH0sXG4gICAgICAgIH0sXG4gICAgfSxcbn0pIl0sCiAgIm1hcHBpbmdzIjogIjtBQUEyUyxTQUFTLG9CQUFvQjtBQUN4VSxPQUFPLGFBQWE7QUFDcEIsT0FBTyxRQUFRO0FBQ2YsT0FBTyxVQUFVO0FBRWpCLFNBQVMsYUFBYSxLQUFLLFlBQVksQ0FBQyxHQUFHO0FBQ3ZDLFFBQU0sUUFBUSxHQUFHLFlBQVksR0FBRztBQUVoQyxRQUFNLFFBQVEsVUFBUTtBQUNsQixVQUFNLFdBQVcsS0FBSyxLQUFLLEtBQUssSUFBSTtBQUVwQyxRQUFJLEdBQUcsU0FBUyxRQUFRLEVBQUUsWUFBWSxHQUFHO0FBQ3JDLG1CQUFhLFVBQVUsU0FBUztBQUFBLElBQ3BDLFdBQVcsS0FBSyxTQUFTLE9BQU8sR0FBRztBQUMvQixnQkFBVSxLQUFLLFFBQVE7QUFBQSxJQUMzQjtBQUFBLEVBQ0osQ0FBQztBQUVELFNBQU87QUFDWDtBQUVBLElBQU8sc0JBQVEsYUFBYTtBQUFBLEVBQ3hCLFNBQVM7QUFBQSxJQUNMLFFBQVE7QUFBQSxNQUNKLE9BQU87QUFBQSxRQUNILEdBQUcsYUFBYSxnQkFBZ0I7QUFBQSxNQUNwQztBQUFBLE1BQ0EsU0FBUztBQUFBLElBQ2IsQ0FBQztBQUFBLEVBQ0w7QUFBQSxFQUNBLEtBQUs7QUFBQSxJQUNELHFCQUFxQjtBQUFBLE1BQ2pCLE1BQU07QUFBQSxRQUNGLE1BQU07QUFBQSxRQUNOLGNBQWM7QUFBQSxRQUNkLG1CQUFtQjtBQUFBLE1BQ3ZCO0FBQUEsSUFDSjtBQUFBLEVBQ0o7QUFDSixDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
