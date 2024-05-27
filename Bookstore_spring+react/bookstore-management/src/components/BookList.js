// src/components/BookList.js
import React from 'react';
import BookItem from './BookItem';

const BookList = ({ books, deleteBook, updateBook }) => {
  return (
    <div>
      <h2>Book List</h2>
      <ul>
        {books.map((book, index) => (
          <BookItem
            key={index}
            index={index}
            book={book}
            deleteBook={deleteBook}
            updateBook={updateBook}
          />
        ))}
      </ul>
    </div>
  );
};

export default BookList;
