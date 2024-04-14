module.exports = {
  files: ["app/**/*", "public/**/*"],
  proxy: "localhost:8080", // Sesuaikan dengan port tempat aplikasi CodeIgniter berjalan
  reloadDelay: 1000, // Menunda reload untuk memastikan perubahan selesai disimpan
};
