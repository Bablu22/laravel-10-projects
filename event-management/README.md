# Event Management API 🔥

This is the README file for the API routes in your Laravel application. It provides documentation for the available endpoints and their usage.

## Authentication

### Login

Endpoint: `POST/login`

Logs in a user and returns an authentication token.

**Request**

```json
{
    "email": "user@example.com",
    "password": "password"
}
```

### Logout

Endpoint: `POST/logout`

Logs out the currently authenticated user.

**Request Header**

```json
{
    "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVC"
}
```

**Response**

```json
{
    "message": "Successfully logged out."
}
```

## Events

### List Events

Endpoint: `GET/events`

Retrieves a list of all events.

**Response**

```json
[
    {
        "id": 210,
        "name": "First Event",
        "description": "This is description",
        "start_time": "2023-07-01 14:00:00",
        "end_time": "2023-07-05 15:00:00"
    },
    {
        "id": 211,
        "name": "Second Event",
        "description": "This is description",
        "start_time": "2023-07-01 14:00:00",
        "end_time": "2023-07-05 15:00:00"
    }
    // More events...
]
```

### Create Event

Endpoint: `POST/events`

Creates a new event.

**Request**

```json
{
  {
    "name":"New Event",
    "description":"This is description",
    "start_time":"2023-07-01 14:00:00",
    "end_time":"2023-07-05 15:00:00"
    }
}
```

**Response**

```json
{
    "name": "New Event",
    "description": "This is description",
    "start_time": "2023-07-01 14:00:00",
    "end_time": "2023-07-05 15:00:00"
}
```

### Get Event

Endpoint: `GET/events/id`

Retrieves details of a specific event.

**Response**

```json
{
    "id": 1,
    "title": "Event 1",
    "date": "2023-07-20",
    "location": "Location 1"
}
```

### Delete Event

Endpoint: `DELETE/events/id`

Deletes a specific event.

**Response**

```json
{
    "message": "Event deleted successfully."
}
```

## Event Attendees

### List Attendees

Endpoint: `GET/events/{event}/attendees`

Retrieves a list of attendees for a specific event.

**Response**

```json
{
    "data": [
        {
            "id": 181,
            "user_id": 89,
            "event_id": 3,
            "created_at": "2023-07-13T11:38:34.000000Z",
            "updated_at": "2023-07-13T11:38:34.000000Z"
        }
    ]
}
```

### Add Attendee

Endpoint: `POST/events/{event}/attendees`

Adds a new attendee to a specific event.

**Request**

```json
{
    "user_id": request()->user()->id,
}
```

**Response**

```json
{
    "data": {
        "user_id": 1,
        "event_id": 6,
        "updated_at": "2023-07-15T12:02:05.000000Z",
        "created_at": "2023-07-15T12:02:05.000000Z",
        "id": 1984
    }
}
```

## Remove Attendee

Endpoint: `DELETE/events/{event}/attendees/{attendee}`

Removes a specific attendee from an event.

**Response**

```json
{
    "message": "Attendee removed successfully."
}
```

### Get Event with User and Attendees

Retrieves details of a specific event with associated user and attendees.

Endpoint: `/events/id?include=user,attendees,attendees.user
`

**Response**

```json
{
    "data": {
        "id": 22,
        "name": "name",
        "description": "Description.",
        "start_time": "2023-07-26 06:43:38",
        "end_time": "2023-09-05 09:04:24",
        "user": {
            "id": 868,
            "name": "Dr. Gilberto VonRueden",
            "email": "skuhn@example.com",
            "email_verified_at": "2023-07-13T11:38:27.000000Z",
            "created_at": "2023-07-13T11:38:32.000000Z",
            "updated_at": "2023-07-13T11:38:32.000000Z"
        },
        "attendees": [
            {
                "id": 324,
                "user_id": 164,
                "event_id": 22,
                "created_at": "2023-07-13T11:38:35.000000Z",
                "updated_at": "2023-07-13T11:38:35.000000Z",
                "user": {
                    "id": 164,
                    "name": "Palma Moore",
                    "email": "kuvalis.ida@example.net",
                    "email_verified_at": "2023-07-13T11:38:27.000000Z",
                    "created_at": "2023-07-13T11:38:28.000000Z",
                    "updated_at": "2023-07-13T11:38:28.000000Z"
                }
            }
        ]
    }
}
```

## Send Event Reminders Command

This command sends event reminders to all users who have an event in the next 24 hours.

**Usage**

```lang-none
php artisan app:send-event-reminders
```
