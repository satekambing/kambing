* Sate Kambing
** Git Pertama saya untuk project - bismillah

Ini framework yang ane kembangin untuk memudahkan membuat web
> Cuma iseng

** Catatan tentang git aja **
git add = untuk menambahkan file (track)
git commit -m "Isi pesan" = untuk men save perubahan di git

git diff = untuk meliat perubahan apa aja yg terjadi di file

git checkout namafile = untuk mengembalikan perubahan
git checkout kodelog --namafile = kodelog di dapat dari perintag git log

git reset = defaultnya --mixed
git reset --mixed kodelog = mereset commitnya aja tanpa ada perubahan di file
git reset --hard kodelog = mereset commitnya sekaligus merubahan di file

git branch = mengecek branch apa aja yg ada dan yg sedang aktif
git branch namafolderbaru = membuat brach / cabang / folder baru
git branch -D namabranh = menghapus branch.. pastikan checkout dlu sbelum menghapusnya
git branch -m namabranch namabrachygbaru = merename brach

git merge namabranch = untuk menggabungkan / fix sudah programnya ke master.. intinya menggabungkan branch ke 2 dengan master


git checkout namabranch = untuk pindah branch

git push origin namabrach = untuk upload dari local ke github(online)
git pull = untuk download dari github ke local


___________________________________________
git status
git log = save2an log / commit
git log --oneline

git config --global user.email "kambing@gmail.com"
git config --global user.name ""

git config --global credential.helper 'cache --timeout=3600'

--- dari github langsung
echo "# kambing" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/satekambing/kambing.git
git push -u origin master
