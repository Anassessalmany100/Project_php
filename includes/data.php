<?php
// Mock data functions - in production, these would query the database

function getDashboardStats() {
    return [
        'total_books' => 2847,
        'available_books' => 2156,
        'borrowed_books' => 542,
        'total_users' => 1284,
        'overdue_books' => 23,
        'new_members_month' => 47
    ];
}

function getRecentBooks() {
    return [
        [
            'id' => '1',
            'title' => 'The Art of Programming',
            'author' => 'Donald Knuth',
            'isbn' => '978-0201896831',
            'category' => 'Technology',
            'status' => 'available',
            'cover' => 'https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=300',
            'rating' => 4.8,
            'pages' => 652
        ],
        [
            'id' => '2',
            'title' => 'Modern Web Design',
            'author' => 'Sarah Johnson',
            'isbn' => '978-1234567890',
            'category' => 'Design',
            'status' => 'borrowed',
            'cover' => 'https://images.pexels.com/photos/1370298/pexels-photo-1370298.jpeg?auto=compress&cs=tinysrgb&w=300',
            'rating' => 4.6,
            'pages' => 428,
            'due_date' => '2024-01-25',
            'borrowed_by' => 'Alice Smith'
        ],
        [
            'id' => '3',
            'title' => 'Database Systems',
            'author' => 'Michael Chen',
            'isbn' => '978-9876543210',
            'category' => 'Technology',
            'status' => 'available',
            'cover' => 'https://images.pexels.com/photos/1370295/pexels-photo-1370295.jpeg?auto=compress&cs=tinysrgb&w=300',
            'rating' => 4.7,
            'pages' => 534
        ],
        [
            'id' => '4',
            'title' => 'Creative Writing',
            'author' => 'Emma Wilson',
            'isbn' => '978-5555555555',
            'category' => 'Literature',
            'status' => 'reserved',
            'cover' => 'https://images.pexels.com/photos/1370297/pexels-photo-1370297.jpeg?auto=compress&cs=tinysrgb&w=300',
            'rating' => 4.4,
            'pages' => 312
        ]
    ];
}

function getRecentActivity() {
    return [
        [
            'id' => '1',
            'type' => 'borrow',
            'user' => 'Alice Smith',
            'book' => 'Modern Web Design',
            'timestamp' => '2 hours ago',
            'description' => 'borrowed Modern Web Design'
        ],
        [
            'id' => '2',
            'type' => 'return',
            'user' => 'Bob Johnson',
            'book' => 'PHP Fundamentals',
            'timestamp' => '4 hours ago',
            'description' => 'returned PHP Fundamentals'
        ],
        [
            'id' => '3',
            'type' => 'new_member',
            'user' => 'Carol Davis',
            'timestamp' => '6 hours ago',
            'description' => 'joined as new member'
        ],
        [
            'id' => '4',
            'type' => 'overdue',
            'user' => 'David Wilson',
            'book' => 'JavaScript Guide',
            'timestamp' => '1 day ago',
            'description' => 'book overdue: JavaScript Guide'
        ]
    ];
}

function getNotifications() {
    return [
        [
            'id' => '1',
            'type' => 'warning',
            'title' => 'Overdue Books',
            'message' => '23 books are overdue and need attention',
            'timestamp' => '1 hour ago',
            'read' => false
        ],
        [
            'id' => '2',
            'type' => 'success',
            'title' => 'New Member',
            'message' => 'Carol Davis has joined the library',
            'timestamp' => '3 hours ago',
            'read' => false
        ],
        [
            'id' => '3',
            'type' => 'info',
            'title' => 'System Update',
            'message' => 'Library system will be updated tonight',
            'timestamp' => '5 hours ago',
            'read' => true
        ]
    ];
}
?>