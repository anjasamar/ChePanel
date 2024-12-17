# Generate a random password
random_password="$(openssl rand -base64 32)"
email="email1@chepanel.com"

# Create the new cheweb user
/usr/sbin/useradd "cheweb" -c "$email" --no-create-home

# do not allow login into cheweb user
echo cheweb:$random_password | sudo chpasswd -e

mkdir -p /etc/sudoers.d
cp -f /usr/local/che/web/sudo/cheweb /etc/sudoers.d/
chmod 440 /etc/sudoers.d/cheweb
