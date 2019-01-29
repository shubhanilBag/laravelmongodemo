echo "DB_DSN=$DB_DSN" >> .env.prod
echo "DB_DATABASE=$DB_DATABASE" >> .env.prod
mv .env.prod .env
bash /start.sh