# Backend PHP - Slot Machine

Developed using PHP version 8.3.1.

## Available Commands

| Command | Description |
|---------|-------------|
| `php serve.php` | Starts a local PHP server on port 8000 `http://localhost:8000`|


## Available API

| Command | Description |
|---------|-------------|
| `GET /api/get-reels-slot` | Saves a matrix in json format, and prints|

### Example Response:
The API `/api/get-reels-slot` returns a JSON response with a 3x5 matrix structure. Each cell in the matrix represents a symbol on the slot machine reels.

```
{
  "reels": [
    ["symbol1", "symbol2", "symbol3", "symbol4", "symbol5"],
    ["symbol2", "symbol3", "symbol4", "symbol5", "symbol1"],
    ["symbol3", "symbol4", "symbol5", "symbol1", "symbol2"]
  ]
}
```