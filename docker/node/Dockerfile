FROM node:lts AS base

WORKDIR /var/www

FROM base AS dependencies

# Copy all application files
COPY . .

# Install dependencies
RUN npm install

# Setup entrypoint
COPY docker/node/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 5173

ENTRYPOINT ["/entrypoint.sh"]