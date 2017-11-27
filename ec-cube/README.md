# EC-CUBE2.13.5の環境構築手順

## 以下の環境を想定
* Windows 7 Pro
* vagrant 1.6.1
* Virtual Box 4.3.10

※ Virtual Boxを4.3.12にアップデートすると環境変数に  
**C:/Program Files/Oracle/VirtualBox**  
を追加する必要がある


## 手順
### VirtualBoxが使えるようにBIOSの設定変更
IntelVTが無効になっていると、仮想マシンに64bit OSをインストールできないので  
>PCを再起動してESCを押し、BIOS Setupに入る  
VTを有効化  
設定を保存して再起動

具体的な方法はPCのメーカーにより異なるので各自で調べる  

### Vagrant, VirtualBoxなどをインストール
Vagrant : http://www.vagrantup.com/downloads.html  
VirtualBox : https://www.virtualbox.org/wiki/Downloads  
Git for Windows : https://git-for-windows.github.io/  

### 仮想マシンを起動
GitHubで [arisugi/eccube_techaca](https://github.com/arisugi/eccube_techaca) をfork  
  
Git Bashを開き、~/Documents 以下に eccube_techaca をclone  
eccube_techaca で仮想マシンを起動  
```
$ cd ~/Documents
$ git clone https://github.com/[GitHubのユーザー名]/eccube_techaca.git
$ cd eccube_techaca
$ vagrant up
```

※ /vagrant => C:/Users/[PCのユーザー名]/Documents/eccube_techaca/ でエラーが発生した場合、  
```
$ vagrant plugin uninstall vagrant-vbguest
$ vagrant plugin install --plugin-source https://rubygems.org/ --plugin-prerelease vagrant-vbguest
```

※ それでも同様のエラーが発生する場合、  
仮想マシンにSSH接続し、kernelをアップデート  
下記のパッケージをインストール  
その後、仮想マシンを再起動
```
$ vagrant ssh

[vagrant@localhost ~] $ sudo yum -y update kernel
[vagrant@localhost ~] $ sudo yum -y install kernel-devel kernel-headers dkms gcc gcc-c++
[vagrant@localhost ~] $ exit

$ vagrant reload
```


### EC-CUBEをインストール
ブラウザで [192.168.55.10/eccube-2.13.5-pgsql/html/install](192.168.55.10/eccube-2.13.5-pgsql/html/install) にアクセス

ECサイトの設定
>店名 : (任意)  
メールアドレス : (任意)  
ログインID : admin  
パスワード : password  

管理機能の設定
>ディレクトリ : admin  

WEBサーバーの設定  
>URL(通常) : デフォルト  
URL(セキュア) : デフォルト  

データベースの設定
>DBの種類 : PostgreSQL  
DB名 : eccube_2135_db  
DBユーザ : eccube_db_user  
DBパスワード : password  


## ※掲示板3に関して
~/Documents/eccube_techaca/www 以下に掲示板2で作成したソースコードを配置  
> 例 : ~/Documents/eccube_techaca/www/keijiban

掲示板用にDBを作成し、連携    
ブラウザで動作確認  
> 例 : 192.168.55.10/eccube_techaca/keijiban


## 参考
[VirtualBoxで64bit版OSを使うためにIntel VTを有効化する](http://d.hatena.ne.jp/torazuka/20100620/p1)  
[Vagrantのmountエラーを解決しようとしたらvboxのリビルドがこける](http://qiita.com/wakaba260/items/b5c87b7815b710f303a0)
