# PHPUnit Notes

## How to build and run php unit test cases

```bash
# Build PHP App Image
docker container prune -f && docker compose --build -d

# Run PHP App Container to execute phpunit test cases
docker container prune -f && docker compose run phpunit

# Install composer dependencies
docker container prune -f && docker compose run composer install
```
