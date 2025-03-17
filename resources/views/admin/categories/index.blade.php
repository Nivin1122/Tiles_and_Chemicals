<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Stone Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="../../script/dashboard.js"></script>
  </head>
  <body class="bg-gray-50">
    <div class="min-h-screen flex">
      <aside class="bg-black text-white w-64 min-h-screen px-4 py-8">
        <div class="mb-8">
          <h2 class="text-2xl font-bold px-4">Stone Solutions</h2>
        </div>

        <nav class="space-y-2">
          <a
            href="#"
            class="flex items-center space-x-2 px-4 py-3 rounded-lg hover:bg-gray-800"
          >
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
          <a
            href="#"
            data-view="categories"
            onclick="switchView('categories')"
            class="flex items-center space-x-2 px-4 py-3 rounded-lg bg-gray-800"
          >
            <i class="fas fa-layer-group"></i>
            <span>Categories</span>
          </a>
          <a
            href="#"
            data-view="products"
            onclick="switchView('products')"
            class="flex items-center space-x-2 px-4 py-3 rounded-lg hover:bg-gray-800"
          >
            <i class="fas fa-box"></i>
            <span>Products</span>
          </a>
        </nav>
      </aside>

      <main class="flex-1 p-8">
      <div id="categoriesContent">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Categories</h1>
        <button
            onclick="openAddCategoryModal()"
            class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 flex items-center space-x-2"
        >
            <i class="fas fa-plus"></i>
            <span>Add Category</span>
        </button>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">ID</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Name</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Description</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $category->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $category->description }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($categories->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">No categories found.</td>
                        </tr>
                    @endif
                </tbody>
                
            </table>
            
        </div>

        <div class="flex items-center justify-between px-6 py-4 border-t">
        <div class="text-sm text-gray-500">
            Showing 
            @if ($categories instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $categories->firstItem() ?? 0 }} to {{ $categories->lastItem() ?? 0 }} of {{ $categories->total() }} entries
            @else
                {{ $categories->count() }} entries
            @endif
            
        </div>
        {{ $categories->links() }}

        </div>
    </div>
</div>


        <div id="productsContent" class="hidden">
          <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">Products</h1>
            <button
              onclick="openAddProductModal()"
              class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 flex items-center space-x-2"
            >
              <i class="fas fa-plus"></i>
              <span>Add Product</span>
            </button>
          </div>
          <div class="bg-white rounded-lg shadow-sm">
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead class="bg-gray-50 border-b">
                  <tr>
                    <th
                      class="px-6 py-4 text-left text-sm font-medium text-gray-500"
                    >
                      ID
                    </th>
                    <th
                      class="px-6 py-4 text-left text-sm font-medium text-gray-500"
                    >
                      Image
                    </th>
                    <th
                      class="px-6 py-4 text-left text-sm font-medium text-gray-500"
                    >
                      Name
                    </th>
                    <th
                      class="px-6 py-4 text-left text-sm font-medium text-gray-500"
                    >
                      Category
                    </th>
                    <th
                      class="px-6 py-4 text-left text-sm font-medium text-gray-500"
                    >
                      Price
                    </th>
                    <th
                      class="px-6 py-4 text-left text-sm font-medium text-gray-500"
                    >
                      Stock
                    </th>
                    <th
                      class="px-6 py-4 text-left text-sm font-medium text-gray-500"
                    >
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                  <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-500">1</td>
                    <td class="px-6 py-4">
                      <img
                        src="path/to/product-image.jpg"
                        alt="Product"
                        class="h-12 w-12 object-cover rounded"
                      />
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                      Premium Marble
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">Marble</td>
                    <td class="px-6 py-4 text-sm text-gray-900">$599.99</td>
                    <td class="px-6 py-4 text-sm text-gray-500">50</td>
                    <td class="px-6 py-4 text-sm">
                      <button
                        onclick="openEditProductModal(1)"
                        class="text-blue-600 hover:text-blue-800 mr-3"
                      >
                        <i class="fas fa-edit"></i>
                      </button>
                      <button
                        onclick="openDeleteModal(1, 'product')"
                        class="text-red-600 hover:text-red-800"
                      >
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="flex items-center justify-between px-6 py-4 border-t">
              <div class="text-sm text-gray-500">
                Showing 1 to 10 of 20 entries
              </div>
              <div class="flex space-x-2">
                <button class="px-3 py-1 rounded border hover:bg-gray-50">
                  Previous
                </button>
                <button class="px-3 py-1 rounded bg-black text-white">1</button>
                <button class="px-3 py-1 rounded border hover:bg-gray-50">
                  2
                </button>
                <button class="px-3 py-1 rounded border hover:bg-gray-50">
                  Next
                </button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div
      id="addCategoryModal"
      class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center"
    >
      <div class="bg-white rounded-lg w-full max-w-md p-6">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-bold">Add Category</h3>
          <button
            onclick="closeAddCategoryModal()"
            class="text-gray-500 hover:text-gray-700"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>
        <form>
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Name</label
              >
              <input
                type="text"
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-black"
              />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Description</label
              >
              <textarea
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-black"
                rows="3"
              ></textarea>
            </div>
          </div>
          <div class="mt-6 flex justify-end space-x-3">
            <button
              type="button"
              onclick="closeAddCategoryModal()"
              class="px-4 py-2 border rounded-lg hover:bg-gray-50"
            >
              Cancel
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800"
            >
              Add Category
            </button>
          </div>
        </form>
      </div>
    </div>
    <div
      id="addProductModal"
      class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center"
    >
      <div class="bg-white rounded-lg w-full max-w-lg p-6">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-bold">Add Product</h3>
          <button
            onclick="closeAddProductModal()"
            class="text-gray-500 hover:text-gray-700"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>
        <form class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Name</label
            >
            <input
              type="text"
              class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-black"
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Category</label
            >
            <select
              class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-black"
            >
              <option value="">Select Category</option>
              <option value="1">Marble</option>
              <option value="2">Granite</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Description</label
            >
            <textarea
              class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-black"
              rows="3"
            ></textarea>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Price</label
              >
              <input
                type="number"
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-black"
              />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Stock Count</label
              >
              <input
                type="number"
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-black focus:border-black"
              />
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1"
              >Product Image</label
            >
            <div
              class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg"
            >
              <div class="space-y-1 text-center">
                <svg
                  class="mx-auto h-12 w-12 text-gray-400"
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 48 48"
                >
                  <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
                <div class="flex text-sm text-gray-600">
                  <label
                    for="file-upload"
                    class="relative cursor-pointer bg-white rounded-md font-medium text-black hover:text-gray-700"
                  >
                    <span>Upload a file</span>
                    <input
                      id="file-upload"
                      name="file-upload"
                      type="file"
                      class="sr-only"
                    />
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-6 flex justify-end space-x-3">
            <button
              type="button"
              onclick="closeAddProductModal()"
              class="px-4 py-2 border rounded-lg hover:bg-gray-50"
            >
              Cancel
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800"
            >
              Add Product
            </button>
          </div>
        </form>
      </div>
    </div>
    <div
      id="editProductModal"
      class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center"
    ></div>

    <div
      id="deleteConfirmModal"
      class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center"
    >
      <div class="bg-white rounded-lg w-full max-w-md p-6">
        <div class="text-center">
          <div class="mb-4">
            <i class="fas fa-exclamation-triangle text-red-500 text-4xl"></i>
          </div>
          <h3 class="text-lg font-bold mb-2">Confirm Delete</h3>
          <p class="text-gray-600 mb-6">
            Are you sure you want to delete this item? This action cannot be
            undone.
          </p>
          <div class="flex justify-center space-x-4">
            <button
              onclick="closeDeleteModal()"
              class="px-4 py-2 border rounded-lg hover:bg-gray-50"
            >
              Cancel
            </button>
            <button
              onclick="confirmDelete()"
              class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 flex items-center"
            >
              <span id="deleteButtonText">Delete</span>
              <div id="deleteSpinner" class="hidden ml-2">
                <i class="fas fa-spinner fa-spin"></i>
              </div>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      id="loadingOverlay"
      class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center"
    >
      <div class="bg-white rounded-lg p-4">
        <div class="flex items-center space-x-3">
          <i class="fas fa-spinner fa-spin text-2xl"></i>
          <span class="text-lg">Loading...</span>
        </div>
      </div>
    </div>
  </body>
</html>