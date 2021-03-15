#!/bin/sh

echo "Doctrine 2 Entities Generator v0.1"
echo "=================================="

# Remove ./config/yaml directory before
rm -rf ./config/yaml

# Create yaml directory
mkdir ./config/yaml

# Read the ./cli-config.php (by default) and generate mapping yaml files to ./config/yaml directory
echo "Generate mapping files:";
php vendor/bin/doctrine orm:convert-mapping --namespace="" --force --from-database yml ./config/yaml

# Generated models to ./src directory
echo "Generate models to src:";
php vendor/bin/doctrine orm:generate-entities --generate-annotations=false --update-entities=true --generate-methods=false ./src

# Validate schema
echo "Validate schema:";
php vendor/bin/doctrine orm:validate-schema
