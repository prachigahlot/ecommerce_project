
-- Top 5 Customers by Quantity Purchased in the Last Year:

SELECT c.name, SUM(od.quantity) AS total_books
FROM customers c
JOIN orders o ON c.customer_id = o.customer_id
JOIN order_details od ON o.order_id = od.order_id
WHERE o.order_date >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
GROUP BY c.customer_id
ORDER BY total_books DESC
LIMIT 5;



--Total Revenue by Author:
SELECT b.author, SUM(od.quantity * b.price) AS total_revenue
FROM books b
JOIN order_details od ON b.book_id = od.book_id
GROUP BY b.author;



--Books Ordered More Than 10 Times:
SELECT b.title, SUM(od.quantity) AS total_quantity
FROM books b
JOIN order_details od ON b.book_id = od.book_id
GROUP BY b.book_id
HAVING total_quantity > 10;
